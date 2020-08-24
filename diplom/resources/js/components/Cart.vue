<template>
    <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="">
            Корзина ({{ $store.state.cartCount }})
        </a>

        <div v-if="$store.state.cart.length > 0" class="navbar-dropdown is-boxed is-right">
            <a v-for="item in $store.state.cart"
               :key="item.id"
               class="navbar-item"
               href=""
            >
                {{ item.title }} x{{ item.quantity }} - ${{ item.totalPrice }}
            </a>

            <a class="navbar-item" href="">
                Итого: ${{ totalPrice }}
            </a>

            <hr class="navbar-divider">

            <a class="navbar-item" href="">
                К оплате
            </a>
        </div>

        <div v-else class="navbar-dropdown is-boxed is-right">
            <a class="navbar-item" href="">
                Корзина пуста
            </a>
        </div>
    </div>
</template>
