# 递四方 SDK （PHP非官方）

1. 常量说明

   AmbientEnum: 正式环境和沙箱环境的枚举参数

       SANDBOX_ADDRESS : 沙箱环境

       FARMAL_ADDRESS : 正式环境

2. 功能说明
    1. http请求和接收
    2. 报文的加签
    3. 软件服务商的Token获取

3. 使用说明

   3.1 参数初始化
    1. appKey：就是在开发平台申请 app 的 appKey
    2. appSecret：与 appKey 相对应的 appSecret
    3. accessToken：软件服务商可通过 SDK 方法获取，递四方商户可不传入该参数

   3.2 请求获取 accessToken
   ```
   TokenUtil::getToken(clientId,redirectUrl, clientSecret, code, grandType, SANDBOX_ADDRESS);
    ```
   3.3 根据 refreshToken 获取 accessToken
   ```
   TokenUtil::getTokenByRefreshToken(clientId, clientSecret,grandType,refreshTOken,redirectUrl,SANDBOX_ADDRESS);
   ```
   3.4 请求 API 接口
   ```
   ApiHttpClientUtils::apiJsongPost(commonParam,paramMap, AmbientEnum::FORMAT_ADDRESS);
   ```
   参数说明：
   
      commonParam : 公共参数
   
      paramMap: API 接口请求参数
   
4. 注意事项
   1. 调用获取 Token 的 API 前请先获取授权码 authorization_code
   2. 调用API请求前请详看相应的接口
   3. 软件服务商必须传入Token，递四方商户可不传或传空值