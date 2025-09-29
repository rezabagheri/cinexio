<script setup lang="ts">
import UserInfo from '@/components/UserInfo.vue';
import {
    DropdownMenuGroup,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
} from '@/components/ui/dropdown-menu';
import { logout } from '@/routes';
import { edit } from '@/routes/profile';
import type { User } from '@/types';
import { Link, router } from '@inertiajs/vue3';
import { LogOut, Settings } from 'lucide-vue-next';
import { useI18n } from 'vue-i18n';
import { computed } from 'vue';

interface Props {
    user: User;
}

defineProps<Props>();
const { t, locale } = useI18n();
const isFa = computed(() => locale.value === 'fa');

const handleLogout = () => {
    router.flushAll();
};
</script>

<template>
    <DropdownMenuLabel class="p-0 font-normal">
        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
            <UserInfo :user="user" :show-email="true" />
        </div>
    </DropdownMenuLabel>
    <DropdownMenuSeparator />
    <DropdownMenuGroup>
        <DropdownMenuItem :as-child="true">
            <Link
                class="block w-full"
                :class="isFa ? 'flex flex-row-reverse items-center justify-end text-right' : 'flex items-center'"
                :href="edit()"
                prefetch
                as="button"
            >
                <Settings :class="isFa ? 'ml-2 h-4 w-4' : 'mr-2 h-4 w-4'" />
                <span class="whitespace-nowrap">{{ t('settings') }}</span>
            </Link>
        </DropdownMenuItem>
    </DropdownMenuGroup>
    <DropdownMenuSeparator />
    <DropdownMenuItem :as-child="true">
        <Link
            class="block w-full"
            :class="isFa ? 'flex flex-row-reverse items-center justify-end text-right' : 'flex items-center'"
            :href="logout()"
            @click="handleLogout"
            as="button"
            data-test="logout-button"
        >
            <LogOut :class="isFa ? 'ml-2 h-4 w-4' : 'mr-2 h-4 w-4'" />
            <span class="whitespace-nowrap">{{ t('logout') }}</span>
        </Link>
    </DropdownMenuItem>
</template>

<style scoped>
.menu-rtl {
  direction: rtl;
  text-align: right;
}
</style>
