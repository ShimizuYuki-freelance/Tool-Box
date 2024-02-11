const hamburger = document.querySelector(".js_hamburger");//ハンバーガーメニューの要素を取得

hamburger.addEventListener("click", function () {//ハンバーガーメニューがクリックされたとき
  hamburger.classList.toggle("is-active");//ハンバーガーメニューにis-acriveクラスをつけ外しする
});