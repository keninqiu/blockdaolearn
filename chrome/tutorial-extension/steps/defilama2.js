var steps = [
    /*
    { delay: 2000,  description: "大家好，我叫Ken" },
    { delay: 2500,  description: "又到了区块链学习的时间" },
    { delay: 4000,  description: "今天我们继续学习Defilama中的收益板块" },
    { delay: 5500,  description: "它主要聚合了各大链上协议的真实收益率信息" },
    { delay: 3800,  description: "本期视频不包含任何投资建议" },
    { delay: 3500,  description: "所有内容仅用于学习和演示" },
    { delay: 4000,  description: "请大家务必根据自己的情况进行判断" },
    
    { delay: 3000,  description: "我们展开收益的菜单栏" },
    { delay: 3500,  description: "首先看第一项，流动性池" },
    { delay: 3500,  description: "显示各类流动性池的收益数据" },
    { delay: 5000,  description: "包括流动性池，项目，链，总锁仓价值TVL" },
    { delay: 6000,  description: "总年化收益率，基础年化收益率，奖励的年化收益率等信息" },

    { delay: 4000,  description: "可以根据TVL或年化收益率来排序" },
    { delay: 4000,  description: "例如点年化收益率排序" },
    { delay: 5000,  description: "我们可以看到有些池子的年化收益率非常高" },
    { delay: 3500,  description: "最高的达到2900多倍" },
    { delay: 3500,  description: "但是它的TVL很小" },
    { delay: 1500,  description: "只有80多万" },

    { delay: 5500,  description: "这种池子看起来收益很高，但其实风险非常大" },
    { delay: 5000,  description: "因为资金体量小，容易被拉盘或砸盘" },
    { delay: 6000,  description: "所用协议可能是新上线的，审计不完善" },
    { delay: 4500,  description: "奖励代币可能波动剧烈，甚至归零" },
    { delay: 4000,  description: "所以大家在看 APY 的时候" },
    { delay: 4000,  description: "一定要结合 TVL 一起看" },
    { delay: 3500,  description: "不要光看收益率就冲进去" },

    { delay: 4000,  description: "例如我们可以选择TVL的范围" },
    { delay: 5500,  description: "最小5000万" },
    { delay: 5000,  description: "这样看起来靠谱一点" },
    { delay: 4000,  description: "找到你感兴趣的池子后" },
    { delay: 4000,  description: "还需要认真考察研究项目的具体情况" },
    { delay: 4000,  description: "再决定是否投资" },
     */
    /*
    { delay: 4000,  description: "接下来再看第二项，中性策略" },
    { delay: 6000,  description: "中性策略的目的是在少承担多空风险的情况下获取稳定收益"},
    { delay: 5000,  description: "这种策略在牛市或熊市中都尽量维持收益"},
    { delay: 4000,  description: "不依赖资产价格的上涨或下跌"},
    { delay: 4000,  description: "可以按照不同的因素进行搜索" },
    { delay: 4000,  description: "例如抵押代币ETH" },
    { delay: 4000,  description: "用户用来抵押在某个 DeFi 协议中" },
    { delay: 5000,  description: "以获取贷款、铸造稳定币或获取收益的代币" },
    { delay: 4000,  description: "借入的代币，例如USDT" },
    { delay: 4000,  description: "最大抵押率，例如75%" },
    { delay: 5000,  description: "这种情况下抵押ETH，借入USDT" },
    { delay: 5000,  description: "如果抵押ETH的当前价值是1000USDT" },
    { delay: 4000,  description: "最大抵押率是75%" },
    { delay: 5000,  description: "意味着最多只能向平台借750USDT" },
    { delay: 4000,  description: "出借的代币数量" },
    { delay: 4000,  description: "借入的代币数量" },
    { delay: 4000,  description: "搜索出来的列表中有策略名称" },
    { delay: 3000,  description: "所用的协议" },
    { delay: 4000,  description: "策略年化收益率" },
    { delay: 4000,  description: "使用策略带来的年化收益率增幅" },
    { delay: 4000,  description: "最大抵押率" },
    { delay: 4000,  description: "可用余额" },
    { delay: 4000,  description: "总锁仓价值" },
    { delay: 3000,  description: "有些策略的收益率比较高" },
    { delay: 4000,  description: "往往是一些新的协议来吸引流量的" },
    { delay: 5000,  description: "也可以根据TVL来过滤" },
    { delay: 5000,  description: "例如TVL最小一千万" },
    { delay: 4000,  description: "点开策略的链接" },
    
    { delay: 3000,  description: "可以获取策略明细信息" },
    { delay: 4000,  description: "包括策略的年化收益率图表" },
    { delay: 3000,  description: "还有操作的详细步骤等" },
    

    { delay: 4000,  description: "第三项是多空策略" },
    { delay: 5000,  description: "例如选择代币WBTC" },
    { delay: 4000,  description: "这里会给出策略内容" },
    { delay: 4000,  description: "在AAVE V3做多WBTC" },
    { delay: 4000,  description: "在Binance做空WUSDT" },
    { delay: 4000,  description: "策略的年化收益率" },
    { delay: 4000,  description: "收益农场年化收益率" },
    { delay: 3000,  description: "资金的年化收益率" },
    { delay: 2000,  description: "资金费率" },
    { delay: 3000,  description: "平均资金费率" },
    { delay: 3000,  description: "农场总锁仓价值" },
    { delay: 3000,  description: "未平仓合约量" },
     
    
    { delay: 4000,  description: "第四项是杠杆借贷" },
    { delay: 4000,  description: "例如选择代币ETH" },
    { delay: 4000,  description: "列表中有池子，项目，链" },
    { delay: 4000,  description: "循环操作的年化收益率" },
    { delay: 5300,  description: "包括存入，借出，再存入借出，不断循环" },
    { delay: 4000,  description: "单次操作的年化收益率" },
    { delay: 4000,  description: "循环操作的放大倍数" },
    { delay: 4000,  description: "最大抵押率等等" },
     

    { delay: 4000,  description: "第五项是总的年化收益率变化情况" },
    { delay: 4500,  description: "可以选择某个代币如WBTC" },
    { delay: 5000,  description: "显示年化收益率变化图" },
    { delay: 4000,  description: "下面是各个协议中一天的变化情况" },
    { delay: 6000,  description: "例如AAVE V3，Uniswap V3的变化情况" },
     

    { delay: 4000,  description: "第六项是稳定币的池子" },
    { delay: 5000,  description: "包括稳定币，所在项目，链，总锁仓价值" },
    { delay: 4500,  description: "还有不同的年化收益率及变化情况" },
    { delay: 4000,  description: "点击某个代币，例如USDT" },
     
    
    { delay: 3000,  description: "进入代币的详细页面" },
    { delay: 6000,  description: "包括年化收益率，30天的平均年化收益率，总锁仓价值" },
    { delay: 5000,  description: "右边是年化收益率和总锁仓价值随时间的变化情况" },
    { delay: 4000,  description: "还有资产的风险分析等等" },
    
    
    { delay: 4000,  description: "第七项是各个项目的统计信息" },
    { delay: 2000,  description: "包括项目名称" },
    { delay: 2000,  description: "是否有空投" },
    { delay: 2000,  description: "分类" },
    { delay: 2000,  description: "池子个数" },
    { delay: 2500,  description: "总锁仓价值" },
    { delay: 2000,  description: "是否审计" },
    { delay: 3000,  description: "中位数年化收益率" },
     */

    { delay: 4000,  description: "最后一项是清真项目" },    
    { delay: 5000,  description: "这类项目更符合穆斯林用户的宗教投资原则" },
    { delay: 3000,  description: "这是它的项目列表" },
    { delay: 6500,  description: "包括池子，项目，链，总锁仓价值，年化收益率等等" },

    { delay: 3000,  description: "好了，以上就是本期视频的全部内容" },
    { delay: 2000,  description: "如果大家对视频感兴趣" },
    { delay: 2000,  description: "欢迎订阅我的频道" },
    { delay: 3000,  description: "也可以在评论区告诉我你的想法" },
    { delay: 2000,  description: "谢谢大家" }
     
];