<template>
    <v-container fluid id="main-layout">
<!--        <v-navigation-drawer-->
<!--            permanent-->
<!--            left-->
<!--            app-->
<!--        >-->
<!--            <v-list>-->
<!--                <v-list-item href="/user/tests">-->
<!--                    <v-list-item-content>-->
<!--                        <v-list-item-title>-->
<!--                            Все тесты-->
<!--                        </v-list-item-title>-->
<!--                    </v-list-item-content>-->
<!--                </v-list-item>-->
<!--            </v-list>-->
<!--        </v-navigation-drawer>-->
        <v-main>
            <router-view></router-view>
        </v-main>
    </v-container>
</template>

<script>
export default {
    name: "Main"
}
</script>

<style scoped>
#main-layout {
    max-width: 1000px;
}
</style>
