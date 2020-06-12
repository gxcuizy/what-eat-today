<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

/**
 * 菜谱管理控制器
 * Class Index
 * @package app\index\controller
 */
class Index extends Controller
{
    // 返回数据格式
    protected $return = ['code' => 0, 'msg' => '操作失败', 'data' => []];
    // 菜谱类型
    protected $food_type = ['1' => '二师兄肉', '2' => '鸡鸭鱼牛肉', '3' => '炒鸡蛋类', '4' => '青菜豆腐', '5' => '其他'];

    /**
     * 首页
     * @return mixed
     */
    public function index()
    {
        // 推荐的3个菜谱
        $num = 3;
        $rec_list = [];
        $select_id = [];
        // 总条数
        $where = ['is_show' => 1];
        $count = Db::name('food')->where($where)->count();
        $rec_field = 'id, food_name, food_img, food_url';
        for ($i = 1; $i <= $num; $i++) {
            // 随机获取一条
            $rand = mt_rand(1, $count);
            $where['id'] = ['not in', $select_id];
            $food = Db::name('food')->where($where)->field($rec_field)->page($rand)->limit(1)->select();
            $rec_list[] = $food[0];
            $select_id[] = $food[0]['id'];
            $count -= 1;
        }
        $this->assign('rec_list', $rec_list);
        // 菜谱类型
        $this->assign('food_type', $this->food_type);
        return $this->fetch();
    }

    /**
     * 菜谱列表
     * @return mixed
     */
    public function menu()
    {
        // 请求参数
        $type_arr = $this->request->param('type_arr/a');
        $food_name = $this->request->param('food_name');
        // 查询条件
        $where = ['is_show' => 1];
        if ($type_arr) {
            $where['food_type'] = ['in', $type_arr];
        }
        if (!empty($food_name)) {
            $food_name = trim($food_name);
            $where['food_name'] = ['like', "%$food_name%"];
        }
        if (empty($type_arr)) {
            $type_arr = array_keys($this->food_type);
        }
        $search = ['type_arr' => $type_arr, 'food_name' => $food_name];
        $this->assign('search', $search);
        // 菜谱列表
        $food_list = Db::name('food')
            ->where($where)
            ->field('id, food_name, food_img, food_url')
            ->order('id desc')
            ->paginate(12, false, ['query' => $this->request->param()]);
        $this->assign('food_list', $food_list);
        // 菜谱类型
        $this->assign('food_type', $this->food_type);
        return $this->fetch();
    }

    /**
     * 新增菜谱
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isAjax()) {
            // 请求参数
            $food_type = $this->request->param('food_type');
            $food_name = $this->request->param('food_name');
            $food_url = $this->request->param('food_url');
            $food_remark = $this->request->param('food_remark');
            $data = [
                'food_type' => $food_type,
                'food_name' => $food_name,
                'food_img' => '/static/images/default.png',
                'food_url' => $food_url,
                'remark' => $food_remark,
                'is_show' => 0,
                'add_time' => time()
            ];
            $res = Db::name('food')->insert($data);
            // 返回数据
            if (!$res) {
                $this->return['msg'] = '新增菜谱失败，请重试';
                exit(json_encode($this->return));
            }
            $this->return['code'] = 1;
            $this->return['msg'] = '新增菜谱成功，请等待审核';
            $this->return['data'] = $data;
            exit(json_encode($this->return));
        }
        // 菜谱类型
        $this->assign('food_type', $this->food_type);
        return $this->fetch();
    }

    /**
     * 开始抽签，获取数据
     */
    public function start()
    {
        if ($this->request->isAjax()) {
            // 获取全部有效的菜谱
            $param = $this->request->param();
            $type_arr = $param['type_arr'];
            $data = Db::name('food')->where(['food_type' => ['in', $type_arr], 'is_show' => 1])->column('food_name');
            // 返回数据
            $this->return['code'] = 1;
            $this->return['msg'] = '请求成功';
            $this->return['data'] = $data;
            exit(json_encode($this->return));
        }
    }

    /**
     * 停止抽签，获取结果
     */
    public function stop()
    {
        if ($this->request->isAjax()) {
            // 请求参数
            $param = $this->request->param();
            $type_arr = $param['type_arr'];
            $num = $param['num'];
            // 初始化where条件
            $where = ['food_type' => ['in', $type_arr], 'is_show' => 1];
            $data = [];
            $select_id = [];
            // 总条数
            $count = Db::name('food')->where($where)->count();
            if ($num > $count) {
                $num = $count;
            }
            for ($i = 1; $i <= $num; $i++) {
                // 随机获取一条
                $rand = mt_rand(1, $count);
                $where['id'] = ['not in', $select_id];
                $food = Db::name('food')->where($where)->field('id, food_type, food_name, food_url')->page($rand)->limit(1)->select();
                $data[] = $food[0];
                $select_id[] = $food[0]['id'];
                $count -= 1;
            }
            // 返回数据
            $this->return['code'] = 1;
            $this->return['msg'] = '请求成功';
            $this->return['data'] = $data;
            exit(json_encode($this->return));
        }
    }

    /**
     * 更换一个同类菜谱
     * @throws \think\Exception
     */
    public function change()
    {
        if ($this->request->isAjax()) {
            $param = $this->request->param();
            $type_arr = $param['type_arr'];
            $select_ids = $param['select_ids'];
            // 总条数
            $where = ['food_type' => ['in', $type_arr], 'is_show' => 1, 'id' => ['not in', $select_ids]];
            $count = Db::name('food')->where($where)->count();
            // 随机获取一条
            $rand = mt_rand(1, $count);
            $food = Db::name('food')->where($where)->field('id, food_type, food_name, food_url')->page($rand)->limit(1)->select();
            // 返回数据
            $this->return['code'] = 1;
            $this->return['msg'] = '更换成功';
            $this->return['data'] = $food[0];
            exit(json_encode($this->return));
        }
    }
}
