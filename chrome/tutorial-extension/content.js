const steps = require('./defalama1');
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
      narrator.style.bottom = '20px';
      narrator.style.left = '50%';
      narrator.style.transform = 'translateX(-50%)';
      narrator.style.background = '#1E1E1E';
      narrator.style.color = '#FFD700';
      narrator.style.padding = '10px 20px';
      narrator.style.borderRadius = '10px';
      narrator.style.zIndex = 9999;
      narrator.style.fontSize = '16px';
      narrator.style.fontFamily = 'sans-serif';
      document.body.appendChild(narrator);    
      
      await new Promise(r => setTimeout(r, step.delay));
      narrator.remove();
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
  