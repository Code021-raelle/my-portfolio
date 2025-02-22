// script.js

document.addEventListener("DOMContentLoaded", () => {
    // Smooth scrolling for navigation links
    document.querySelectorAll("nav ul li a").forEach(anchor => {
        anchor.addEventListener("click", function(event) {
            event.preventDefault();
            const targetId = this.getAttribute("href").substring(1);
            document.getElementById(targetId).scrollIntoView({
                behavior: "smooth"
            });
        });
    });

    // Theme switcher
    const toggleTheme = document.createElement("button");
    toggleTheme.textContent = "Toggle Dark Mode";
    toggleTheme.style.position = "fixed";
    toggleTheme.style.bottom = "20px";
    toggleTheme.style.right = "20px";
    document.body.appendChild(toggleTheme);

    toggleTheme.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");
    });

    // Add dark mode styles
    const style = document.createElement("style");
    style.textContent = `
        .dark-mode {
            background-color: #333;
            color: #fff;
        }
    `;
    document.head.appendChild(style);
});
