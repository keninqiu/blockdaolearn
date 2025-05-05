window.addEventListener("message", (event) => {
    if (event.data.action === "run-tutorial") {
      startTutorial();
    }
  });
  
  async function startTutorial() {
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


      /*
      <div style="position:fixed; bottom: 30px; left: 50%; transform: translateX(-50%); background: #1E1E1E; color: #FFD700; padding: 10px 20px; border-radius: 10px; z-index: 9999; font-size: 24px; font-family: sans-serif">点击Add to Chrome，再点 添加到扩展程序，安装完毕</div>
      */

      
      /* 
      const btn = document.querySelector(step.selector);
      if (btn) {
        console.log("Clicking:", step.description);
        btn.click();
      } else {
        console.warn("Button not found:", step.description);
      }
    

      setTimeout(() => {
        narrator.remove();
      }, 3000);
      */
    }
  }
  