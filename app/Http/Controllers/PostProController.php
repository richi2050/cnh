<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostPro;
use App\PostPre;

class PostProController extends Controller
{
    public function create(Request $request){
        $dataPre = PostPre::find($request->id);
        $dataPro = PostPro::find($dataPre->id);

        $datGuid=$dataPre->guid;
        if($dataPre->post_type == "attachment"){

            $file1= $dataPre->guid;
            $dat= explode('wp-content', $file1);

            $dataFile1= $_SERVER['DOCUMENT_ROOT']."/pre/wp-content/".$dat[1];
            $dataFile2= $_SERVER['DOCUMENT_ROOT']."/pro/wp-content/".$dat[1];
            $datGuid= $_SERVER['SERVER_NAME']."/pro/wp-content/".$dat[1];
           
            
            copy($dataFile1,$dataFile2);
        }



        if(isset($dataPro)){
            $dataPro->post_author = $dataPre->post_author;
            $dataPro->post_date = $dataPre->post_date;
            $dataPro->post_date_gmt = $dataPre->post_date_gmt;
            $dataPro->post_content = $dataPre->post_content;
            $dataPro->post_title = $dataPre->post_title;
            $dataPro->post_excerpt = $dataPre->post_excerpt;
            $dataPro->post_status = $dataPre->post_status;
            $dataPro->comment_status = $dataPre->comment_status;
            $dataPro->ping_status = $dataPre->ping_status;
            $dataPro->post_password = $dataPre->post_password;
            $dataPro->post_name = $dataPre->post_name;
            $dataPro->to_ping = $dataPre->to_ping;
            $dataPro->pinged = $dataPre->pinged;
            $dataPro->post_modified = $dataPre->post_modified;
            $dataPro->post_modified_gmt = $dataPre->post_modified_gmt;
            $dataPro->post_content_filtered = $dataPre->post_content_filtered;
            $dataPro->post_parent = $dataPre->post_parent;
            $dataPro->guid = $datGuid;
            $dataPro->menu_order = $dataPre->menu_order;
            $dataPro->post_type = $dataPre->post_type;
            $dataPro->post_mime_type = $dataPre->post_mime_type;
            $dataPro->comment_count = $dataPre->comment_count;
            $dataPro->save();

        }else{
            PostPro::create([
                'post_author'           => $dataPre->post_author,
                'post_date'             => $dataPre->post_date,
                'post_date_gmt'         => $dataPre->post_date_gmt,
                'post_content'          => $dataPre->post_content,
                'post_title'            => $dataPre->post_title,
                'post_excerpt'          => $dataPre->post_excerpt,
                'post_status'           => $dataPre->post_status,
                'comment_status'        => $dataPre->comment_status,
                'ping_status'           => $dataPre->ping_status,
                'post_password'         => $dataPre->post_password,
                'post_name'             => $dataPre->post_name,
                'to_ping'               => $dataPre->to_ping,
                'pinged'                => $dataPre->pinged,
                'post_modified'         => $dataPre->post_modified,
                'post_modified_gmt'     => $dataPre->post_modified_gmt,
                'post_content_filtered' => $dataPre->post_content_filtered,
                'post_parent'           => $dataPre->post_parent,
                'guid'                  => $dataPre->guid,
                'menu_order'            => $dataPre->menu_order,
                'post_type'             => $dataPre->post_type,
                'post_mime_type'        => $dataPre->post_mime_type,
                'comment_count'         => $dataPre->comment_count
            ]);
        }
    }
}
