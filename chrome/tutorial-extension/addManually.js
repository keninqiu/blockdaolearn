//allow pasting

var steps = [

    { delay: 3200,  description: "首先我们打开rainbow钱包的官网" },
    { delay: 3200,  description: "rainbow.me" },
    { delay: 3200,  description: "点击Download进入下载页面" },
    { delay: 3200,  description: "有两大类版本" },
    { delay: 3200,  description: "包括桌面版和手机版" },
    { delay: 3200,  description: "桌面版支持六大主流的浏览器" },
    { delay: 3200,  description: "手机版分为IOS和Android版" },
    { delay: 3200,  description: "本期视频重点讲解Chrome浏览器插件版本" },

    { delay: 3200,  description: "点击Chrome，再点击Add to Chrome，Add extension" },
    { delay: 3200,  description: "Chrome浏览器插件钱包安装完毕" },
];

await new Promise(r => setTimeout(r, 5000));

for (let step of steps) {
    const narrator = document.createElement('div');
    narrator.textContent = step.description;
    narrator.style.position = 'fixed';
    narrator.style.bottom = '30px';
    narrator.style.left = '50%';
    narrator.style.transform = 'translateX(-50%)';
    narrator.style.background = '#1E1E1E';
    narrator.style.color = '#FFD700';
    narrator.style.padding = '10px 20px';
    narrator.style.borderRadius = '10px';
    narrator.style.zIndex = 9999;
    narrator.style.fontSize = '24px';
    narrator.style.fontFamily = 'sans-serif';
    document.body.appendChild(narrator);    

    await new Promise(r => setTimeout(r, step.delay));
    narrator.remove();
}

