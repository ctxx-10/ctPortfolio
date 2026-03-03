'use strict';

//スライダー全体
const slide = document.getElementById('slide');
//矢印
const prev = document.getElementById('prev');
const next = document.getElementById('next');
//インディケーター全体
const indicator = document.getElementById('indicator');
//インディケーターのドット部分(黒丸)
const lists = document.querySelectorAll('.list');
//スライダーの長さ(画像の枚数)
const totalSlides = lists.length;
//現在のインデックス番号の取得
let count = 2;
//自動再生用変数
let autoPlayInterval;

//初期位置
let slideWidth;
let startOffset;

//追加
//矢印連続クリックによる画像非表示防止(アニメーション稼働時は動かない)
let isAnimation = false;

function setSlideSize () {
  if (window.innerWidth >= 768) {
    //PC
    slideWidth = 375;                // 295 + 40*2
    startOffset = 490;
  } else {
    slideWidth = 315;                // 295 + 10*2
    startOffset = 30;
  }
}
function slidePos() {
  const moveX = -(slideWidth * count) + startOffset;
  slide.style.transform = `translateX(${moveX}px)`;
}
//初期化
setSlideSize();
slidePos();
updateListBackground();
window.addEventListener('resize', function () {
  slide.style.transition = 'none';
  setSlideSize();
  slidePos();
  updateListBackground();
});


//インディケーターのドット部分の色変更
function updateListBackground() {
  let activeIndex = count - 2;
  //ダミー対策(左・右)
  if (activeIndex < 0) {
    activeIndex = totalSlides - 2;
  }
  if (activeIndex >= totalSlides) {
    activeIndex = 0;
  }
  for (let i = 0; i < lists.length; i++) {
    if (i === activeIndex) {
      lists[i].style.backgroundColor = '#000000';
    } else {
      lists[i].style.backgroundColor = '#8F8F8F';
    };
  };
}

//追加・変更 ↓
//nextクリックするとカウント1増える＆インディケーターのドット部分の色変更
function nextClick() {
  if (isAnimation) return;
  isAnimation = true;

  slide.style.transition = 'transform 0.6s ease';
  count++;
  slidePos();
}
function prevClick() {
  if (isAnimation) return;
  isAnimation = true;

  slide.style.transition = 'transform 0.6s ease';
  count--;
  slidePos();
}

//アニメーション終了後の処理
slide.addEventListener('transitionend', function(e) {
  //transformの時だけ実行
  if (e.propertyName !== 'transform') return;

  //右ダミーに到達したら本体へ
  if (count === totalSlides + 2) {
    slide.style.transition = 'none';
    count = 2;
    slidePos();
  }

  //左ダミーに到達したら本体へ
  if (count === 1) {
    //一枚目表示
    count = totalSlides + 1;
    slide.style.transition = 'none';
    // count = totalSlides;
    slidePos();
  }

  updateListBackground();
  isAnimation = false;
});
//追加・変更 ↑

//自動再生用のクリックファンクション  完全再利用可能
function startAutoPlay() {
  autoPlayInterval = setInterval(nextClick, 3000);
}

//インディケーター押されると自動再生用時間のリセットファンクション
function resetAutoPlayInterval() {
  clearInterval(autoPlayInterval);
  startAutoPlay();
}

//矢印クリック後の動き  アロー関数→理解できるファンクションの形に直す
next.addEventListener('click', function() {
  nextClick();
  resetAutoPlayInterval();
});
prev.addEventListener('click', function() {
  prevClick();
  resetAutoPlayInterval();
});


//インディケーター外枠
indicator.addEventListener('click', function(event) {
  if (!event.target.classList.contains('list')) return;
  const index = Array.from(lists).indexOf(event.target);
  //位置変更
  count = index + 2;
  slidePos();
  updateListBackground();
  //resetAutoPlayInterval();
});

//自動再生呼び出しファンクション
startAutoPlay();
