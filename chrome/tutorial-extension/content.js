window.addEventListener("message", (event) => {
    if (event.data.action === "run-tutorial") {
      startTutorial();
    }
  });
  
  async function startTutorial() {
    const steps = [
      /*
      { delay: 1500,  description: "大家好，我叫Ken" },
      { delay: 2200,  description: "又到了区块链学习的时间" },
      */
/*
      { delay: 3500,  description: "今天我们学习一个超实用的工具——DefiLlama" },
      { delay: 2700,  description: "一个全网 DeFi 数据的排行榜" },
      { delay: 2700,  description: "最近很多人都在聊 L2 热潮" },
      { delay: 1500,  description: "链上资金流动" },
      { delay: 2300,  description: "那到底这些资金都去哪了?" },
      { delay: 1800,  description: "哪条链热度最高?" },
      { delay: 4500,  description: "今天我们用 Defilama 一起看看真实数据怎么说" },
      
      
      { delay: 4200,  description: "首先我们打开DefiLlama的官网，defilama.com" },
      { delay: 3500,  description: "在左边的菜单栏看到它目前有很多功能" },
      { delay: 2300,  description: "主要分为三大板块" },
      { delay: 7500,  description: "首先是数据面板Dashboards，展示Defi不同维度的数据" },
      { delay: 6500,  description: "第二是工具板块Tools，列出官方的一些常用工具" },
      { delay: 3500,  description: "最后是社交平台和联系方式" },
      

      
      { delay: 5000,  description: "本期视频重点讲数据面板中的Defi这个系列的内容" },
      { delay: 4500,  description: "Defilama官网默认进入Defi的主页面Overview" },
      { delay: 2500,  description: "这是所有链的信息汇总" },
      { delay: 7000,  description: "也可以在快捷按钮切换主流链如Etheruem，Bitcoin，Solana，BSC等" },
      { delay: 6000,  description: "如果想看其它链的数据，在右边Chain这里可以选择或搜索" },
      { delay: 3000,  description: "例如选择Polygon" },
      { delay: 5000,  description: "或者搜索OP主网" },
      { delay: 5000,  description: "可以看到信息汇总这里有很多个不同的指标" },
      { delay: 2500,  description: "其中最重要的是TVL" },
      { delay: 4000,  description: "TVL就是在整个Defi市场上的锁仓量" },
      { delay: 4000,  description: "目前我们可以看到总锁仓量是900多亿" },
      { delay: 5000,  description: "这包含目前在以太坊，比特币和其它链上" },
      { delay: 4000,  description: "所有项目的资金和稳定币的价值总和" },
      { delay: 4000,  description: "在右边这个图表中我们可以看到在19年的时候" },
      { delay: 4000,  description: "Defi市场是一个比较小的体量" },
      { delay: 4000,  description: "在20年，21年逐步开始扩张" },
      { delay: 4000,  description: "22年到达顶峰，形成了上一波的牛市" },
      { delay: 4000,  description: "23年走低，24年又开始走高" },
      { delay: 4000,  description: "在24年底的时候又是一个小高潮" },
      { delay: 3000,  description: "到现在一路走低" },
      { delay: 4000,  description: "这个就是TVL，一个很重要的参考指标" },
      
      
      { delay: 3000,  description: "下面是各个协议排名" },
      { delay: 3000,  description: "默认按照TVL来排序" },
      { delay: 4000,  description: "第一名是AAVE，一个去中心化借贷系统" },
      { delay: 2000,  description: "它支持16条链" },
      { delay: 4000,  description: "第二名是Lido，一个流动性质押的平台" },
      { delay: 2000,  description: "支持5条链" },
      { delay: 4000,  description: "第三名是EigenLayer，再质押平台" },
      { delay: 2500,  description: "目前只支持以太坊" },
      { delay: 5000,  description: "将质押的ETH 进行二次质押来获得额外收益" },
      { delay: 4000,  description: "你也可以按照其它的因素进行排序" },
      { delay: 5000,  description: "例如一天变动，七天变动和一个月变动幅度" },
      { delay: 4000,  description: "我们可以进入每个协议的明细页面" },
      { delay: 2000,  description: "以Lido为例" },
      { delay: 6000,  description: "打开后在右边可以看到TVL的变化图" },
      { delay: 6000,  description: "我们可以看到在22年5月的时候UST的崩盘" },
      { delay: 5000,  description: "还有随后的stETH的崩盘" },
      { delay: 5000,  description: "导致TVL的急速下降" },
      { delay: 4000,  description: "还有FTX的破产" },
      { delay: 4000,  description: "也导致了TVL的大幅回调" },
      { delay: 5000,  description: "这边是它的当前价格0.7刀" },
      { delay: 5300,  description: "下面是Lido项目的归类，它是属于流动性质押类别" },
      { delay: 6000,  description: "还有它的审计情况，网站，社区，代币地址等" },
      { delay: 5000,  description: "整体呢就是每个项目都是这样的一个介绍" },
      
      
      { delay: 3000,  description: "我们来看第二项" },
      { delay: 3000,  description: "从链的角度来看" },
      { delay: 4000,  description: "Defilama对链做了一个对比" },
      { delay: 4000,  description: "这个表里显示了每条链的协议数" },
      { delay: 2000,  description: "活跃地址数" },
      { delay: 4000,  description: "还有随时间的变化情况" },
      { delay: 5000,  description: "我们可以看到以太坊还是占了绝对的统治地位" },
      { delay: 3000,  description: "Solana紧跟其后" },
      { delay: 7500,  description: "还可以根据稳定币来排名" },
      { delay: 5000,  description: "我们可以看到第二名是Tron波场链" },
      { delay: 4000,  description: "它的协议虽然很少只有35个" },
      { delay: 5000,  description: "但是它的活跃地址数很多，250万" },
      { delay: 4000,  description: "这就是链的对比" },
      
      
      { delay: 3000,  description: "我们再来看第三项" },
      { delay: 2000,  description: "跨链资产" },
      { delay: 6000,  description: "每条链的总跨链资产值，本地资产值等等" },
      
      
      { delay: 8000,  description: "第四项是链和链之间的对比" },
      { delay: 4000,  description: "我们以Arbitrum和Solana为例" },
      { delay: 5000,  description: "他们的TVL曲线图比较" },
      { delay: 5000,  description: "其中蓝色的是Arbitrum，绿色的是Solana" },
      { delay: 5000,  description: "Aribtrum的整体波动比较平缓" },
      { delay: 5000,  description: "而Solana的波幅就很大" },
      { delay: 5000,  description: "下面列出了每条链的总锁仓价值" },
      { delay: 3000,  description: "24小时的费用" },
      { delay: 2000,  description: "收入" },
      { delay: 3000,  description: "App的收入" },
      { delay: 3000,  description: "总交易量" },
      { delay: 5000,  description: "永续合约的交易量等等" },

      
      { delay: 3000,  description: "第五个就是空投" },
      { delay: 5000,  description: "列出了一些未来有可能会有空投的项目" },
      { delay: 5000,  description: "包括项目名称，分类，TVL等" },
      { delay: 5000,  description: "点进去是项目的具体信息" },
      { delay: 6000,  description: "例如网站，社交账号，竞争对手等等" },
      { delay: 4000,  description: "如果大家对空投感兴趣的话" },
      { delay: 4000,  description: "可以在这里得到一些空投项目的信息" },
      { delay: 5000,  description: "再对感兴趣的项目深入了解，研究，调查" },
      { delay: 3000,  description: "再决定是否参与" },
       

      { delay: 5000,  description: "下面这个Treasures是每个协议的金库锁仓量" },
      { delay: 5000,  description: "因为很多项目都是通过去中心化的方式来治理" },
      { delay: 5000,  description: "可以理解为每个项目背后都是一个组织" },
      { delay: 4000,  description: "而这个组织都有一个金库" },
      { delay: 4000,  description: "这个面板就展示了金库的数量" },
      { delay: 4000,  description: "目前锁仓量最大的是以太坊基金会" },
      { delay: 6000,  description: "主流币种是BTC和ETH，占比90%左右" },
      { delay: 3000,  description: "其它占9%左右" },
      { delay: 7000,  description: "也可以搜索，例如Uniswap" },
      { delay: 3000,  description: "它100%是自有代币" },
      { delay: 5000,  description: "体量在20亿左右" },
      { delay: 7000,  description: "通过这个金库面板我们就可以了解到项目方目前的资金储备情况" },
      { delay: 3000,  description: "还有它们的资产分配" },
      { delay: 5000,  description: "大部分项目方都是以持有绿色的稳定币为主" },
      { delay: 4000,  description: "因为自身代币的价格会有所波动" },
      
      
      { delay: 3000,  description: "另外对Defi整个生态来说" },
      { delay: 2500,  description: "非常重要的一点" },
      { delay: 3000,  description: "就是预言机这一块" },
      { delay: 5000,  description: "预言机是Defi上的一个比较关键的基础设施" },
      { delay: 3000,  description: "它将现实世界的数据" },
      { delay: 5000,  description: "如资产价格、天气、体育比赛结果等" },
      { delay: 3000,  description: "发送到区块链" },
      { delay: 3000,  description: "供智能合约使用" },
      { delay: 6000,  description: "例如借贷平台需要币价数据来判断用户是否应该被清算" },

      { delay: 5000,  description: "预言机的主要市场份额被chainlink占领" },
      { delay: 4000,  description: "目前已经接入了424个协议" },
      { delay: 4000,  description: "TVS大概是300亿美元" },
      { delay: 6000,  description: "30天内永续合约的交易量是190多亿美元" },
       
      
      { delay: 3000,  description: "接着我们来看Forks" },
      { delay: 3000,  description: "因为随着Defi的发展" },
      { delay: 4000,  description: "出现了很多现象级的产品" },
      { delay: 3000,  description: "而这些产品出现之后呢" },
      { delay: 3000,  description: "会有大量的模仿者" },
      { delay: 4000,  description: "这些模仿的项目我们称之为Forks" },
      { delay: 4000,  description: "在原有项目的基础上稍作修改或微调" },
      { delay: 3000,  description: "生成一个新的项目" },
      { delay: 3000,  description: "以Uniswap为例" },
      { delay: 5000,  description: "它的V3有160个Forks" },
      { delay: 5000,  description: "V2有691个Forks" },
      { delay: 5000,  description: "点进去V2" },
      { delay: 5000,  description: "我们可以看到很多项目" },
      { delay: 5000,  description: "包括我们熟知的项目" },
      { delay: 5000,  description: "如PancakeSwap" },
      { delay: 5000,  description: "SushiSwap" },
      { delay: 5000,  description: "都是模仿者" },
      
      { delay: 4000,  description: "下面是每条链上的热门协议" },
      { delay: 3000,  description: "以以太坊为例" },
      { delay: 2000,  description: "借贷是AAVE" },
      { delay: 3000,  description: "流动性质押是Lido" },
      { delay: 6000,  description: "再质押是EigenLayer等等" },
*/
      /*
      { delay: 5000,  description: "之前的对比是链之间的对比" },
      { delay: 5000,  description: "现在可以对协议进行比较" },
      { delay: 10000,  description: "我们以AAVE V3和Lido为例" },
      { delay: 5000,  description: "可以清楚地看到它们的TVL变化情况的对比图" },
       */
/*
      { delay: 5000,  description: "协议开销" },
      { delay: 5000,  description: "包括每个协议的人员数量和年开销" },

      { delay: 5000,  description: "ETH在每个协议中的使用数量" },
      { delay: 5000,  description: "例如Lido使用了价值150亿美元的ETH" },

      { delay: 5000,  description: "按类别来看协议" },
      { delay: 5000,  description: "例如属于借贷的协议有500多个" },

      { delay: 5000,  description: "最新的协议，包括它的分类和TVL等" },

      { delay: 5000,  description: "协议使用的语言，Solidity占统治地位" },
      { delay: 5000,  description: "大家如果想搞智能合约开发的话" },
      { delay: 5000,  description: "以目前的实际情况" },
      { delay: 5000,  description: "建议学习Solidity语言" },

      { delay: 5000,  description: "token持有人的利润或损失" },
      { delay: 5000,  description: "例如选择Bitcoin" },
      { delay: 5000,  description: "最近7天持有的例如变化情况" },
*/
      { delay: 3000,  description: "好了，以上就是本期视频的全部内容" },
      { delay: 2000,  description: "如果大家对视频感兴趣" },
      { delay: 2000,  description: "欢迎订阅我的频道" },
      { delay: 3000,  description: "也可以在评论区告诉我你的想法" },
      { delay: 2000,  description: "谢谢大家" },
       
    ];
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
  