/* eslint-env worker */
/* global Jimp */

importScripts('./lib/jimp.min.js');

self.addEventListener('message', e => {
  Jimp.read(e.data).then(lenna => {
    lenna
      .contain(800, 800) // resize
      .quality(80) // set JPEG quality
      .getBase64(Jimp.AUTO, (err, src) => {
        if (err) throw err;
        self.postMessage(src);
        self.close();
      });
  });
});
