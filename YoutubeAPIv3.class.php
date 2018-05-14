<?php

class YoutubeAPIv3PHP
{
  public $apikey;
  public $version;

  public function __construct($apikey,$version){
    $this->apikey = $apikey;
    $this->version = $version;
    $this->point = "https://www.googleapis.com/youtube/v3/";
  }
  
  /*
    ユーザー情報からチャンネルリストを引っ張ってくる
  */
  public function UserInfo($username){
    $connect = $this->point.'channels?part=snippet&forUsername='.$username.'&key='.$this->apikey;
    $result = file_get_contents($connect);
    return $result;
  }
  
  /*
    チャンネルIDからチャンネル情報を引っ張ってくる
  */
  public function ChannelInfo($cid){
    $connect = $this->point.'channels?part=snippet&id='.$cid.'&key='.$this->apikey;
    $result = file_get_contents($connect);
    return $result;
  }
  
  /*
    チャンネルIDから動画IDを取得する
  */
  public function ChannelMovieList($cid){
    $connect = $this->point.'search?part=snippet&channelId='.$cid.'&key='.$this->apikey;
    $result = file_get_contents($connect);
    return $result;
  }
  
  /*
    動画IDから動画情報を取得する
    
    part変数の中身の操作
    - snippet
      - タイトル、説明、カテゴリなどの動画の基本的な情報
    - contentDetails
      - 動画の画質とか？
    - recordingDetails
      - 地域情報
    - statistics
      - 動画の統計情報(再生回数やいいね回数、コメント数など)
    - topicDetails
      - 関連動画とか
    基本的には
    ```$var->MovieInfo("snippet,statistics","動画ID");```
    でいいと思われる。
      
  */
  public function MovieInfo($part,$mid){
    $connect = $this->point.'videos?part='.$part.'&id='.$mid.'&key='.$this->apikey;
    $result = file_get_contents($connect);
    return $result;
  }
}
?>