const base = {
  src: './themes/gus_webpack/',
  dest: './',
  node: 'node_modules',
  config: './themes/gus_webpack/config'
};

const folders = {
  images: {
    src: `${base.src}images/`
  },
  scripts: {
    src: `${base.src}javascript/`
  },
  styles: {
    src: `${base.src}scss/`,
    dest: `${base.src}css/`,
    maps: `${base.src}css/`
  },
  config: {
    src: `${base.src}hint/`
  }
};

module.exports = {
  base: base,
  folders: folders
}
