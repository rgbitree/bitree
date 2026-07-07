(function () {
  "use strict";

  const icons = {
    "arrow-right": '<path d="M5 12h14"></path><path d="m13 6 6 6-6 6"></path>',
    "arrow-up-right": '<path d="M7 17 17 7"></path><path d="M7 7h10v10"></path>',
    "arrow-up-short": '<path d="M12 19V5"></path><path d="m6 11 6-6 6 6"></path>',
    "arrows-expand": '<path d="M8 3H3v5"></path><path d="M16 3h5v5"></path><path d="M8 21H3v-5"></path><path d="M16 21h5v-5"></path><path d="M3 3l7 7"></path><path d="m14 10 7-7"></path><path d="m3 21 7-7"></path><path d="m14 14 7 7"></path>',
    "bar-chart": '<path d="M4 20V10"></path><path d="M10 20V4"></path><path d="M16 20v-7"></path><path d="M22 20H2"></path>',
    "bar-chart-line": '<path d="M4 20V10"></path><path d="M10 20V4"></path><path d="M16 20v-7"></path><path d="M22 20H2"></path><path d="m4 9 6-5 6 7 4-4"></path>',
    "briefcase": '<path d="M10 6V5a2 2 0 0 1 2-2h0a2 2 0 0 1 2 2v1"></path><path d="M3 8h18v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"></path><path d="M3 13h18"></path>',
    "camera-reels": '<path d="M6 7h8a3 3 0 0 1 3 3v7H6a3 3 0 0 1-3-3v-4a3 3 0 0 1 3-3Z"></path><path d="m17 11 4-3v8l-4-3"></path><circle cx="7" cy="5" r="2"></circle><circle cx="13" cy="5" r="2"></circle>',
    "check-circle": '<path d="M9 12l2 2 4-5"></path><circle cx="12" cy="12" r="9"></circle>',
    "check-circle-fill": '<path d="M9 12l2 2 4-5"></path><circle cx="12" cy="12" r="9"></circle>',
    "clock-fill": '<circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path>',
    "code-slash": '<path d="m9 18 6-12"></path><path d="m6 8-4 4 4 4"></path><path d="m18 8 4 4-4 4"></path>',
    "cpu": '<rect x="7" y="7" width="10" height="10" rx="2"></rect><rect x="10" y="10" width="4" height="4"></rect><path d="M4 9h3"></path><path d="M4 15h3"></path><path d="M17 9h3"></path><path d="M17 15h3"></path><path d="M9 4v3"></path><path d="M15 4v3"></path><path d="M9 17v3"></path><path d="M15 17v3"></path>',
    "database": '<ellipse cx="12" cy="5" rx="8" ry="3"></ellipse><path d="M4 5v6c0 1.7 3.6 3 8 3s8-1.3 8-3V5"></path><path d="M4 11v6c0 1.7 3.6 3 8 3s8-1.3 8-3v-6"></path>',
    "diagram-2": '<circle cx="6" cy="6" r="3"></circle><circle cx="18" cy="6" r="3"></circle><circle cx="12" cy="18" r="3"></circle><path d="M8 8l3 7"></path><path d="m16 8-3 7"></path>',
    "diagram-3": '<circle cx="12" cy="4" r="2.5"></circle><circle cx="5" cy="18" r="2.5"></circle><circle cx="19" cy="18" r="2.5"></circle><path d="M12 7v4"></path><path d="M12 11H5v4"></path><path d="M12 11h7v4"></path>',
    "envelope": '<rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m3 7 9 6 9-6"></path>',
    "envelope-fill": '<rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m3 7 9 6 9-6"></path>',
    "eye": '<path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"></path><circle cx="12" cy="12" r="3"></circle>',
    "facebook": '<path fill="currentColor" stroke="none" d="M14 8h3V4h-3c-3.2 0-5 1.9-5 5v3H6v4h3v6h4v-6h3l1-4h-4V9c0-.7.3-1 1-1Z"></path>',
    "gear": '<circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.8 1.8 0 0 0 .36 2l.05.05-2.1 3.64-.07-.02a1.8 1.8 0 0 0-1.94.46 1.8 1.8 0 0 0-.46 1.94l.02.07H8.74l.02-.07a1.8 1.8 0 0 0-.46-1.94 1.8 1.8 0 0 0-1.94-.46l-.07.02-2.1-3.64.05-.05a1.8 1.8 0 0 0 .36-2 1.8 1.8 0 0 0-1.48-1.2L3 13.8V9.6l.12-.02A1.8 1.8 0 0 0 4.6 8.4a1.8 1.8 0 0 0-.36-2l-.05-.05 2.1-3.64.07.02a1.8 1.8 0 0 0 1.94-.46 1.8 1.8 0 0 0 .46-1.94L8.74.26h6.52l-.02.07a1.8 1.8 0 0 0 .46 1.94 1.8 1.8 0 0 0 1.94.46l.07-.02 2.1 3.64-.05.05a1.8 1.8 0 0 0-.36 2 1.8 1.8 0 0 0 1.48 1.2l.12.02v4.2l-.12.02A1.8 1.8 0 0 0 19.4 15Z"></path>',
    "globe": '<circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3c2.4 2.5 3.6 5.5 3.6 9S14.4 18.5 12 21c-2.4-2.5-3.6-5.5-3.6-9S9.6 5.5 12 3Z"></path>',
    "graph-up": '<path d="M4 19V5"></path><path d="M4 19h16"></path><path d="m7 15 4-4 3 3 5-7"></path>',
    "graph-up-arrow": '<path d="M4 19V5"></path><path d="M4 19h16"></path><path d="m7 15 4-4 3 3 5-7"></path><path d="M16 7h3v3"></path>',
    "grid-3x3-gap": '<rect x="3" y="3" width="5" height="5" rx="1"></rect><rect x="9.5" y="3" width="5" height="5" rx="1"></rect><rect x="16" y="3" width="5" height="5" rx="1"></rect><rect x="3" y="9.5" width="5" height="5" rx="1"></rect><rect x="9.5" y="9.5" width="5" height="5" rx="1"></rect><rect x="16" y="9.5" width="5" height="5" rx="1"></rect><rect x="3" y="16" width="5" height="5" rx="1"></rect><rect x="9.5" y="16" width="5" height="5" rx="1"></rect><rect x="16" y="16" width="5" height="5" rx="1"></rect>',
    "heart-pulse": '<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8L12 21l3-3"></path><path d="M14 16h2l1.5-4 2 7 1.5-3h2"></path>',
    "instagram": '<rect x="4" y="4" width="16" height="16" rx="4"></rect><circle cx="12" cy="12" r="3.5"></circle><circle cx="17" cy="7" r="1"></circle>',
    "layers": '<path d="m12 3 9 5-9 5-9-5 9-5Z"></path><path d="m3 12 9 5 9-5"></path><path d="m3 16 9 5 9-5"></path>',
    "lightning-charge": '<path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path>',
    "lightning-charge-fill": '<path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path>',
    "list": '<path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path>',
    "magic": '<path d="m15 4 5 5"></path><path d="m14 5 5 5-9 9-5-5 9-9Z"></path><path d="M5 3v4"></path><path d="M3 5h4"></path><path d="M19 16v4"></path><path d="M17 18h4"></path>',
    "palette2": '<path d="M12 3a9 9 0 0 0 0 18h1.5a1.8 1.8 0 0 0 1.2-3.1 1.3 1.3 0 0 1 .9-2.2H17a4 4 0 0 0 4-4C21 6.9 17 3 12 3Z"></path><circle cx="7.5" cy="10" r="1"></circle><circle cx="10" cy="7" r="1"></circle><circle cx="14" cy="7" r="1"></circle><circle cx="16.5" cy="10" r="1"></circle>',
    "people": '<path d="M16 21v-2a4 4 0 0 0-8 0v2"></path><circle cx="12" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path><path d="M2 21v-2a4 4 0 0 1 3-3.87"></path><path d="M8 3.13a4 4 0 0 0 0 7.75"></path>',
    "play-circle": '<circle cx="12" cy="12" r="9"></circle><path d="m10 8 6 4-6 4Z"></path>',
    "rocket-takeoff": '<path d="M5 15c-1.2 1-2 3-2 5 2 0 4-.8 5-2"></path><path d="M9 15 4 10l4-2 4-4c2.4-2.4 5.7-2.8 9-2- .8 3.3-1.2 6.6-3.6 9l-4 4-2 4-5-5Z"></path><circle cx="15" cy="8" r="1.5"></circle>',
    "shield-check": '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"></path><path d="m9 12 2 2 4-5"></path>',
    "shield-shaded": '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"></path><path d="M12 2v20"></path>',
    "speedometer2": '<path d="M21 12a9 9 0 1 0-18 0"></path><path d="M12 12l5-5"></path><path d="M7 20h10"></path>',
    "star-fill": '<path fill="currentColor" stroke="none" d="m12 2 3.1 6.3 6.9 1-5 4.9 1.2 6.8L12 17.8 5.8 21 7 14.2 2 9.3l6.9-1L12 2Z"></path>',
    "stars": '<path d="m12 3 1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3Z"></path><path d="m19 14 .8 2.2L22 17l-2.2.8L19 20l-.8-2.2L16 17l2.2-.8L19 14Z"></path>',
    "telephone": '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.7.6 2.5a2 2 0 0 1-.5 2.1L8 9.5a16 16 0 0 0 6.5 6.5l1.2-1.2a2 2 0 0 1 2.1-.5c.8.3 1.6.5 2.5.6a2 2 0 0 1 1.7 2Z"></path>',
    "telephone-fill": '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.7.6 2.5a2 2 0 0 1-.5 2.1L8 9.5a16 16 0 0 0 6.5 6.5l1.2-1.2a2 2 0 0 1 2.1-.5c.8.3 1.6.5 2.5.6a2 2 0 0 1 1.7 2Z"></path>',
    "window": '<rect x="3" y="4" width="18" height="16" rx="2"></rect><path d="M3 9h18"></path><path d="M8 4v5"></path>',
    "window-stack": '<rect x="7" y="7" width="14" height="12" rx="2"></rect><path d="M3 15V5a2 2 0 0 1 2-2h12"></path>',
    "x": '<path d="M6 6 18 18"></path><path d="m18 6-12 12"></path>',
    "x-circle-fill": '<circle cx="12" cy="12" r="9"></circle><path d="m9 9 6 6"></path><path d="m15 9-6 6"></path>'
  };

  function iconName(iconEl) {
    const iconClass = Array.from(iconEl.classList).find((className) => className.indexOf("ui-icon-") === 0 && className !== "ui-icon");
    return iconClass ? iconClass.replace("ui-icon-", "") : "";
  }

  function render(iconEl) {
    const name = iconName(iconEl);
    const body = icons[name];
    if (!body) return;
    iconEl.innerHTML = '<svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" aria-hidden="true" focusable="false">' + body + "</svg>";
    iconEl.dataset.rendered = "svg";
  }

  function renderAll(root) {
    (root || document).querySelectorAll(".ui-icon").forEach(render);
  }

  window.BitreeIcons = { render, renderAll };

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => renderAll(document));
  } else {
    renderAll(document);
  }
})();
