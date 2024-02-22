let isSidebarOpen = false;

function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  const overlay = document.querySelector('.overlay');
  const openBtn = document.querySelector('.open-btn');

  if (isSidebarOpen) {
    sidebar.style.left = '-240px';
    overlay.style.display = 'none';
    openBtn.textContent = '☰';
  } else {
    sidebar.style.left = '0';
    overlay.style.display = 'block';
    openBtn.textContent = '✕';
  }

  isSidebarOpen = !isSidebarOpen;
}
