# youtube API 

- YouTube Data API v3
    - [https://developers.google.com/youtube/v3/docs/?hl=ja](https://developers.google.com/youtube/v3/docs/?hl=ja)

youtubeから色々取得するクラス

## 使い方

```$youtube = new YoutubeAPIv3PHP('APIKEY','v1');```
 
- ユーザー情報
    - ```$youtube->UserInfo("ユーザー名");``` 
- チャンネル情報
    - ```$youtube->ChannelInfo("チャンネルID");``` 
- チャンネルIDから動画リスト
    - ```$youtube->ChannelMovieList("チャンネルID");``` 
- 動画情報
    - ```$youtube->MovieInfo("snippet,statistics","動画ID");```