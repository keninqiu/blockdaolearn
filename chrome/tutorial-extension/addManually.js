//allow pasting

var steps = [
    { delay: 4000,  description: "另一种是用法币来购买虚拟货币" },
    { delay: 2000,  description: "点击购买按钮" },
    { delay: 3000,  description: "我们可以看到目前它支持" },
    { delay: 2500,  description: "从MoonPay购买" },
    { delay: 3000,  description: "和从Coinbase购买两种途径" },
    { delay: 3000,  description: "选择MoonPay或Coinbase" },
    { delay: 3000,  description: "完成相应的KYC并付款后" },
    { delay: 4000,  description: "你的钱包就会收到相对应的币" }
];


await new Promise(r => setTimeout(r, 10000));

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