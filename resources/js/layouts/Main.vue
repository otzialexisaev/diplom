<template>
    <v-container fluid id="main-layout">
        <v-navigation-drawer
            permanent
            left
            app
        >
            <v-list>
                <v-list-item href="/admin/test/index">
                    <v-list-item-content>
                        <v-list-item-title>
                            Все тесты
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item href="/admin/test/create">
                    <v-list-item-content>
                        <v-list-item-title>
                            Создание теста
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item href="/admin/material/create">
                    <v-list-item-content>
                        <v-list-item-title>
                            Добавление материала
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item href="/admin/subject/create">
                    <v-list-item-content>
                        <v-list-item-title>
                            Добавление предмета
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
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
