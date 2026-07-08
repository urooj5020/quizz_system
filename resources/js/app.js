import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

const applyTheme = (theme) => {
    document.documentElement.setAttribute("data-theme", theme);
    document.documentElement.classList.toggle("dark", theme === "dark");
    localStorage.setItem("theme", theme);

    const isDark = theme === "dark";

    const toggles = [
        document.getElementById("theme-toggle"),
        document.getElementById("mobile-theme-toggle"),
    ];

    toggles.forEach((toggle) => {
        if (!toggle) return;
        toggle.setAttribute(
            "aria-label",
            isDark ? "Switch to light theme" : "Switch to dark theme",
        );
    });

    document.querySelectorAll("#theme-toggle-label, #mobile-theme-label").forEach((el) => {
        if (el) el.textContent = isDark ? "Light" : "Dark";
    });

    document.querySelectorAll(".theme-sun-icon").forEach((el) => el.classList.toggle("hidden", isDark));
    document.querySelectorAll(".theme-moon-icon").forEach((el) => el.classList.toggle("hidden", !isDark));
};

const initializeTheme = () => {
    const savedTheme = localStorage.getItem("theme");
    const prefersDark = window.matchMedia(
        "(prefers-color-scheme: dark)",
    ).matches;
    const theme = savedTheme || (prefersDark ? "dark" : "light");

    applyTheme(theme);

    document.querySelectorAll("#theme-toggle, #mobile-theme-toggle").forEach((toggle) => {
        if (toggle) {
            toggle.addEventListener("click", () => {
                const currentTheme =
                    document.documentElement.getAttribute("data-theme") ===
                    "dark"
                        ? "light"
                        : "dark";
                applyTheme(currentTheme);
            });
        }
    });
};

window.addEventListener("DOMContentLoaded", initializeTheme);
Alpine.start();
