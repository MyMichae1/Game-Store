// JavaScript for toggling the burger menu
const menuIcon = document.getElementById("menu-icon");
const menu = document.getElementById("menu");

menuIcon.addEventListener("click", () => {
    menuIcon.classList.toggle("active");  // Toggle burger icon animation
    menu.classList.toggle("active");      // Toggle menu visibility
});
