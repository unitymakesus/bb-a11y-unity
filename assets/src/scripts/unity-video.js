import Plyr from 'plyr';

const players = Array.from(document.querySelectorAll('.unity-video__player')).map(p => new Plyr(p));
