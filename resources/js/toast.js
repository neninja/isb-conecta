// M é o materialize

export function toast(config) {
    M.toast(config);
}

export function toastPermanente(config) {
    config.html +=
        '<button class="btn-flat toast-action" onclick="M.Toast.getInstance(this.parentElement).dismiss()">Fechar</button>';
    config.displayLength = Infinity;
    toast(config);
}
