function data() {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
      return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
      !!window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    )
  }

  function setThemeToLocalStorage(value) {
    window.localStorage.setItem('dark', value)
  }

  

  return {
    dark: getThemeFromLocalStorage(),
    toggleTheme() {
      this.dark = !this.dark
      setThemeToLocalStorage(this.dark)
    },
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen
    },
    closeSideMenu() {
      this.isSideMenuOpen = false
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false
    },
    
    isPagesMenuOpen: false,
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen
    },
    isPagesMenuOpen2: false,
    togglePagesMenu2() {
      this.isPagesMenuOpen2 = !this.isPagesMenuOpen2
    },
    isPagesMenuOpen3: false,
    togglePagesMenu3() {
      this.isPagesMenuOpen3 = !this.isPagesMenuOpen3
    },
    // Modal
    isModalOpen: false,
    openModal() {
      this.isModalOpen = true
    },
    closeModal() {
      this.isModalOpen = false
    },

    // Modal Confirm
    isModalConfirmOpen: false,
    openModalConfirm() {
      this.isModalConfirmOpen = true
    },
    closeModalConfirm() {
      this.isModalConfirmOpen = false
    },

    // Modal Tim
    isModalTimOpen: false,
    openModalTim() {
      this.isModalTimOpen = true
    },
    closeModalTim() {
      this.isModalTimOpen = false
    },

    // Modal Tim->Delete
    isModalTimDeleteOpen: false,
    openModalTimDelete() {
      this.isModalTimDeleteOpen = true
    },
    closeModalTimDelete() {
      this.isModalTimDeleteOpen = false
    },
    
    // Modal Tim->Edit
    isModalTimEditOpen: false,
    openModalTimEdit() {
      this.isModalTimEditOpen = true
    },
    closeModalTimEdit() {
      this.isModalTimEditOpen = false
    },
    
    isModalFinansialEdit: false,
    openModalFinansialEdit() {
      this.isModalFinansialEdit = true
    },
    closeModalFinansialEdit() {
      this.isModalFinansialEdit = false
    },

    isModalFinansialDelete: false,
    openModalFinansialDelete() {
      this.isModalFinansialDelete = true
    },
    closeModalFinansialDelete() {
      this.isModalFinansialDelete = false
    },
    
    isModalFileMonevEdit: false,
    openModalFileMonevEdit() {
      this.isModalFileMonevEdit = true
    },
    closeModalFileMonevEdit() {
      this.isModalFileMonevEdit = false
    },

    isModalPrestasiEdit: false,
    openModalPrestasiEdit() {
      this.isModalPrestasiEdit = true
    },
    closeModalPrestasiEdit() {
      this.isModalPrestasiEdit = false
    }
    // Logout
    // logout(){
    //   const protocol = window.location.protocol;
    //   const hostname = window.location.hostname;
    //   const path = '/auth/logout';
    //   const port = window.location.port:
    //   window.location.assign(protocol + '//' + hostname + port + path);
    // }
  }
}
