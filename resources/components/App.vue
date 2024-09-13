<template>
    <div>
        <header class="header">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <router-link class="navbar-brand" to="/">Главная</router-link>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">1</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <router-link class="nav-link" aria-current="page" to="/departament">Отделы</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" to="/directory">Справочник</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link"  to="/contacts" aria-disabled="true">Контакты</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="main">
            <router-view></router-view>
        </main>
        <div v-for="per in person">
       First Name: {{per.name}}
        </div>
    </div>
</template>

<script>


export default {
    name: "App",
    components: {

    },
    data() {
        return {
            person:[
                {
                    id: 1,
                    name: 'Vasilek',
                    age: 25
                },
                {
                    id: 2,
                    name: 'Lisa',
                    age: 26
                },
                {
                    id: 3,
                    name: 'Irina',
                    age: 33
                }
            ]
        }
    }
}
</script>

<style scoped>
.header{
    margin: 0 auto;
    width: 780px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-items: center;
}

.main{
    width: 880px;
    margin: 0 auto;
}
</style>
