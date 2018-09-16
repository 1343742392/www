<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $fileName =   $file->getInfo()['name'];
        echo $fileName;
        if (empty($file)) {
            $this->error('请选择上传文件');
        }
        $info = $file->validate(['ext' => 'mp3,flac,wav'])->move(ROOT_PATH . 'public' . DS .
            'uploads', iconv("UTF-8","GBK//IGNORE",$fileName));
        if ($info) {
            $time = time();
            $result = Db::execute('insert into music (music_name, time) values ("'.$fileName.'", "'.$time.'")');
            dump($result);    
        } else {
            $this->error($file->getError());
        }
    }

    public function search($name)
    {
        $queryResult = Db::query('select music_name from music ');
        if(count($queryResult) == 0 ) return 0;
        $reslut = array();
        reset($queryResult);
        foreach($queryResult as $seveName)
        {
            if(preg_match('/.*'.$name.'.*/', $seveName['music_name']))
            {
               $reslut->array_push($seveName['music_name']);
            }
        }
    }
}
