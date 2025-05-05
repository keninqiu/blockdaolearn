//allow pasting

var steps = [
    { delay: 3200,  description: "Rainbow还支持添加观察钱包" },
    { delay: 3200,  description: "点击钱包地址" },
    { delay: 3200,  description: "点击添加其他钱包" },
    { delay: 3200,  description: "点击观察以太坊地址" },
    { delay: 4000,  description: "输入以太坊地址或ENS名称" },
    { delay: 5000,  description: "例如输入孙宇晨的钱包地址" },
    { delay: 3200,  description: "点击观察钱包" },
    { delay: 4500,  description: "输入名称例如sun" },
    { delay: 3200,  description: "点完成" }
];

await new Promise(r => setTimeout(r, 14000));

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

0x3ddfa8ec3052539b6c9549f12cea2c295cff5296