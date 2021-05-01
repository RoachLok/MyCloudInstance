const themeMap = {
  dark: "light",
  light: "solar",
  solar: "dark"
};

const theme = localStorage.getItem('theme')
  || (tmp = Object.keys(themeMap)[0],
      localStorage.setItem('theme', tmp),
      tmp);
const bodyClass = document.body.classList;
bodyClass.add(theme);

function toggleTheme() {
  const current = localStorage.getItem('theme');
  const next = themeMap[current];

  bodyClass.replace(current, next);
  localStorage.setItem('theme', next);

  const editors = document.getElementsByTagName('iframe');
  let editor_theme = '';
  if (next == 'dark')
    editor_theme = 'dracula';
  else if (next == 'solar')
    editor_theme = 'solarized_light';

  for (editor of editors) {
    editor.contentWindow.changeTheme(editor_theme);
  }
}

document.getElementById('themeButton').onclick = toggleTheme;