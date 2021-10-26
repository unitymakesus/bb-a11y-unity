import Plyr from 'plyr';

const players = Array.from(document.querySelectorAll('.unity-audio__player')).map(p => new Plyr(p));
