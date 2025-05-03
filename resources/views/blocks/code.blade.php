<x-code-block :content="
    'contract Token {
        mapping(address => uint256) balances;

        function transfer(address to, uint256 amount) public {
            require(balances[msg.sender] >= amount);
            balances[msg.sender] -= amount;
            balances[to] += amount;
        }
    }'
" />