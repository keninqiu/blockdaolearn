@extends('layouts.main')
@section('content')
<div class="max-w-3xl w-full p-8 ">

    <div class="text-center mb-6">
      <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" alt="Telegram Logo" class="mx-auto h-16 mb-4">
      <h2 class="text-2xl font-semibold">@blockdaolearn</h2>
    </div>
    <h1 class="text-4xl font-bold mb-4 text-center">加入我们的区块链学习频道(Telegram: @)</h1>
    <p class="text-lg mb-6 text-center">探索区块链技术、智能合约、DeFi、NFTs 等前沿知识，开启你的 Web3 世界之旅！</p>

    <div class="grid gap-4 mb-6">
      <div class="flex items-start gap-4">
        <div class="text-green-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <div>
          <h2 class="font-semibold">每日精选内容</h2>
          <p class="text-sm text-gray-500">最新区块链动态、技术教程与实战案例。</p>
        </div>
      </div>

      <div class="flex items-start gap-4">
        <div class="text-green-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <div>
          <h2 class="font-semibold">行业热点追踪</h2>
          <p class="text-sm text-gray-500">掌握最火的协议、空投机会、链上数据。</p>
        </div>
      </div>

      <div class="flex items-start gap-4">
        <div class="text-green-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <div>
          <h2 class="font-semibold">互动与答疑</h2>
          <p class="text-sm text-gray-500">和志同道合的朋友一起学习、讨论、成长。</p>
        </div>
      </div>
    </div>

    <div class="text-center">
      <a href="https://t.me/blockdaolearn" target="_blank" class="inline-block px-8 py-3 bg-red-700 hover:bg-red-500 font-bold rounded-full transition text-white">立即加入</a>
    </div>
  </div>
@endsection