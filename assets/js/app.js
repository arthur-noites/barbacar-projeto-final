if (window.location.pathname.includes("cadastro.html")) {
  document.querySelector("form").addEventListener("submit", function (e) {
    e.preventDefault();

    const nome = this.Nome.value;
    const senha = this.Senha.value;
    const confirmar = this.ConfirmSenha.value;

    if (senha !== confirmar) {
      alert("As senhas não coincidem!");
    } else {
      alert("Cadastro realizado com sucesso!");
      window.location.href = "login.html";
    }
  });
}

if (window.location.pathname.includes("login.html")) {
  document.querySelector("form").addEventListener("submit", function (e) {
    e.preventDefault();

    const nome = this.Nome.value;
    const senha = this.Senha.value;

    if (nome === "abc" && senha === "123") {
      alert("Login realizado com sucesso!");
      window.location.href = "index.html";
    } else {
      alert("Nome ou senha incorretos!");
    }
  });
}

document.addEventListener("DOMContentLoaded", function() {
  const toggle = document.getElementById("menu-toggle");
  const menu = document.querySelector(".menu");

  toggle.addEventListener("click", () => {
    menu.classList.toggle("active");
  });
});
