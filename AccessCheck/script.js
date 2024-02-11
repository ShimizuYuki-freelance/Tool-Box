//➀：ピュアjsでsessionStorageを使う方法
function AccessCheck1() {
  if (sessionStorage.getItem('visit')) { //sessionStorageからvisitキーを取得できたら→2回目以降のアクセス
    //2回目以降のアクセスで行う処理
  } else { //sessionStorageからvisitキーを取得できなかった場合→初回アクセス時
    sessionStorage.setItem('visit', 'true'); //sessionStorageにvisitキーとtrueの値を保存
    //初回アクセス時の処理
  }
};

AccessCheck1();

//➁：ピュアjsでlocalStorageを使う方法
function AccessCheck2() {
  if (localStorage.getItem('visit')) { //sessionStorageからvisitキーを取得できたら→2回目以降のアクセス
    //2回目以降のアクセスで行う処理
  } else { //sessionStorageからvisitキーを取得できなかった場合→初回アクセス時
    localStorage.setItem('visit', 'true'); //sessionStorageにvisitキーとtrueの値を保存
    //初回アクセス時の処理
  }
};

AccessCheck2();