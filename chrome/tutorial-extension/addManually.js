//allow pasting

var steps = [
    { delay: 3000,  description: "好了，以上就是本期视频的全部内容" },
    { delay: 2000,  description: "如果大家对视频感兴趣" },
    { delay: 2000,  description: "欢迎订阅我的频道" },
    { delay: 3000,  description: "也可以在评论区告诉我你的想法" },
    { delay: 2000,  description: "谢谢大家" }  
];


await new Promise(r => setTimeout(r, 15000));

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

//0xf1b0c9bb890dce5a135da57e6d84db15e218643f