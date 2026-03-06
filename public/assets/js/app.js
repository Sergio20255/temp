const toggle = document.getElementById('themeToggle');
if (toggle) {
  toggle.addEventListener('click', () => {
    const html = document.documentElement;
    html.dataset.theme = html.dataset.theme === 'dark' ? 'light' : 'dark';
  });
}

const dropzone = document.getElementById('dropzone');
if (dropzone) {
  dropzone.addEventListener('dragover', (event) => {
    event.preventDefault();
    dropzone.classList.add('active');
  });
  dropzone.addEventListener('dragleave', () => dropzone.classList.remove('active'));
}

const convertBtn = document.getElementById('convertBtn');
if (convertBtn) {
  convertBtn.addEventListener('click', async () => {
    const progressBar = document.getElementById('progressBar');
    const downloadBtn = document.getElementById('downloadBtn');
    if (progressBar) progressBar.style.width = '45%';
    setTimeout(() => {
      if (progressBar) progressBar.style.width = '100%';
      if (downloadBtn) downloadBtn.classList.remove('hidden');
    }, 1200);
  });
}
