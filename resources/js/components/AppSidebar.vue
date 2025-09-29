<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid, FileArchive, Users, Search } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';
import { useI18n } from 'vue-i18n';

defineProps<{ side?: 'left' | 'right' }>();

const { t } = useI18n();

const mainNavItems: NavItem[] = [
    {
        title: t('dashboard'),
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: t('myArchive'),
        href: '/dashboard#my-archive', // Placeholder, update to real route if needed
        icon: FileArchive,
    },
    {
        title: t('friendsList'),
        href: '/dashboard#friends-list', // Placeholder, update to real route if needed
        icon: Users,
    },
    {
        title: t('globalMovieSearch'),
        href: '/dashboard#global-movie-search', // Placeholder, update to real route if needed
        icon: Search,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: t('githubRepo'),
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: Folder,
    },
    {
        title: t('documentation'),
        href: 'https://laravel.com/docs/starter-kits#vue',
        icon: BookOpen,
    },
];
</script>

<template>
    <Sidebar :side="side" collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
