window.addEventListener("load", () => {
    const loading = document.getElementById("loadingOverlay");

    // 点滅3回分でローディング終了
    setTimeout(() => {
        loading.classList.add("hide");

    }, 3000);
});


