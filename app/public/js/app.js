const toClipboard = str => {
  const selected = document.getSelection().rangeCount > 0 ? document.getSelection().getRangeAt(0) : false;

  const t = document.createElement('textarea');
  t.value = str;
  t.setAttribute('readonly', '');
  t.style.position = 'absolute';
  t.style.left = '-9999px';

  document.body.appendChild(t);
  t.select();
  document.execCommand('copy');
  document.body.removeChild(t);

  if(selected) {
    document.getSelection().removeAllRanges();
    document.getSelection().addRange(selected);
  }
};
