

window.addEventListener("load", () => {
    const loading = document.getElementById("loadingOverlay");

    // 点滅2回分でローディング終了
    setTimeout(() => {
        loading.classList.add("hide");

    }, 3000);
});
