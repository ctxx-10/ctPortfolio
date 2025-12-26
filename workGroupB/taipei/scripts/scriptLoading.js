window.addEventListener("load", () => {
    const loading = document.getElementById("loadingOverlay");

    // 点滅１回分でローディング終了
    setTimeout(() => {
        loading.classList.add("hide");
 
        
  
    }, 3000);

});
//毎回入ると結構待ち時間長いので短くしてあります。（変更可）