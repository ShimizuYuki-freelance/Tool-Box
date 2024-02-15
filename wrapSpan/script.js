const wrapSpan = function (str) {
  return [...str].map((char) => `<span>${char}</span>`).join('');
}

//細かい解説
// const wrapSpanDetail = function (str) {
//   // 文字列を配列に変換
//   const charArray = [...str];

//   // 各文字を<span>要素で囲んだ配列を生成
//   const spanArray = charArray.map(function (char) {
//     return `<span>${char}</span>`;
//   });

//   // 配列を文字列に結合
//   const resultString = spanArray.join('');

//   // 結果を返す
//   return resultString;
// }

window.addEventListener('load', () => {
  let element = document.querySelector('.target');//対象の文字列を取得
  element.innerHTML = wrapSpan(element.textContent);
  Array.from(element.children).forEach((char, index) => {
    setTimeout(() => {
      char.classList.add('is-active');
    }, 40 * index);
  });
});

