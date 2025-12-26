window.addEventListener("load", () => {
    const loading = document.getElementById("logoLoading");

    // 点滅3回分でローディング終了
    setTimeout(() => {
        loading.classList.add("hide");

    }, 9000);
});
