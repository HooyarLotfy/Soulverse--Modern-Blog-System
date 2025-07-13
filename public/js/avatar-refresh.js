/**
 * Avatar Refresh Utility
 * Provides functions to refresh avatar images across the application
 * and bust browser caches when avatars are updated
 */

window.AvatarRefresh = {
    /**
     * Generate a cache-busting timestamp
     */
    getCacheBuster: function() {
        return Date.now();
    },

    /**
     * Refresh all avatar images on the current page
     * @param {string} userId - The user ID whose avatar was updated (optional)
     */
    refreshAllAvatars: function(userId = null) {
        const cacheBuster = this.getCacheBuster();
        
        // Find all avatar images
        const avatarSelectors = [
            '.profile-avatar',
            '.author-avatar img',
            '.comment-avatar img',
            'img[src*="avatars/"]',
            '[data-avatar-user]'
        ];

        avatarSelectors.forEach(selector => {
            const elements = document.querySelectorAll(selector);
            elements.forEach(element => {
                if (element.tagName === 'IMG') {
                    // If we have a specific user ID, only update that user's avatars
                    if (userId && element.dataset.avatarUser && element.dataset.avatarUser !== userId) {
                        return;
                    }
                    
                    // Update image src with cache buster
                    const currentSrc = element.src;
                    const baseUrl = currentSrc.split('?')[0]; // Remove existing query params
                    element.src = `${baseUrl}?v=${cacheBuster}`;
                }
            });
        });
    },

    /**
     * Refresh avatars for a specific user
     * @param {string} userId - The user ID
     * @param {string} newTimestamp - Optional timestamp to use instead of current time
     */
    refreshUserAvatars: function(userId, newTimestamp = null) {
        const cacheBuster = newTimestamp || this.getCacheBuster();
        
        // Find all images with data-avatar-user attribute matching userId
        const userAvatars = document.querySelectorAll(`[data-avatar-user="${userId}"]`);
        
        userAvatars.forEach(element => {
            if (element.tagName === 'IMG') {
                const currentSrc = element.src;
                const baseUrl = currentSrc.split('?')[0];
                element.src = `${baseUrl}?v=${cacheBuster}`;
            }
        });
    },

    /**
     * Update user avatar after successful upload
     * @param {string} userId - The user ID
     * @param {string} avatarPath - The new avatar path (optional)
     * @param {string} userName - The user name for fallback display
     */
    updateAfterUpload: function(userId, avatarPath = null, userName = null) {
        const cacheBuster = this.getCacheBuster();
        
        if (avatarPath) {
            // Update existing avatar images
            this.refreshUserAvatars(userId, cacheBuster);
            
            // Convert any initial-based avatars to actual images
            const initialAvatars = document.querySelectorAll(`[data-avatar-user="${userId}"]`);
            initialAvatars.forEach(element => {
                if (element.tagName === 'DIV' && element.classList.contains('avatar-placeholder')) {
                    // Replace div with img element
                    const img = document.createElement('img');
                    img.src = `/storage/${avatarPath}?v=${cacheBuster}`;
                    img.alt = userName || 'User Avatar';
                    img.className = element.className.replace('avatar-placeholder', 'profile-avatar');
                    img.dataset.avatarUser = userId;
                    element.parentNode.replaceChild(img, element);
                }
            });
        } else {
            // If no avatar path, ensure we're showing initials
            this.refreshUserAvatars(userId, cacheBuster);
        }
    },

    /**
     * Initialize avatar refresh listeners
     */
    init: function() {
        // Listen for custom avatar update events
        document.addEventListener('avatar-updated', (event) => {
            const { userId, avatarPath, userName, timestamp } = event.detail;
            this.updateAfterUpload(userId, avatarPath, userName);
        });

        // Listen for profile update events from Livewire/AJAX
        document.addEventListener('profile-updated', (event) => {
            if (event.detail && event.detail.userId) {
                this.refreshUserAvatars(event.detail.userId);
            } else {
                this.refreshAllAvatars();
            }
        });
    }
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    AvatarRefresh.init();
});

// Also expose globally for immediate use
window.refreshAvatars = AvatarRefresh.refreshAllAvatars.bind(AvatarRefresh);
window.refreshUserAvatars = AvatarRefresh.refreshUserAvatars.bind(AvatarRefresh);
