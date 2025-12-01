"use client"

import { Search, Bell } from "lucide-react"
import { useState } from "react"

interface TopNavbarProps {
  onMenuClick: () => void
}

export function TopNavbar({ onMenuClick }: TopNavbarProps) {
  const [notificationCount] = useState(3)

  return (
    <div className="sticky top-0 z-20 glass-card border-b backdrop-blur-xl">
      <div className="flex items-center justify-between h-16 px-6 md:px-8">
        {/* Search */}
        <div className="flex-1 max-w-md">
          <div className="relative">
            <Search className="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground" size={18} />
            <input
              type="text"
              placeholder="Search students, classes..."
              className="w-full pl-10 pr-4 py-2 rounded-lg bg-muted border border-border/50 text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all"
            />
          </div>
        </div>

        {/* Right Actions */}
        <div className="flex items-center gap-4 ml-6">
          {/* Notifications */}
          <button className="relative p-2 rounded-lg hover:bg-muted transition-all group">
            <Bell size={20} className="group-hover:text-foreground transition-colors" />
            {notificationCount > 0 && (
              <span className="absolute top-0 right-0 w-5 h-5 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center text-xs font-bold text-white">
                {notificationCount}
              </span>
            )}
          </button>

          {/* User Menu */}
          <button className="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-muted transition-all">
            <div className="w-8 h-8 rounded-full bg-gradient-to-br from-primary to-secondary" />
            <span className="text-sm font-medium hidden sm:inline">Admin</span>
          </button>
        </div>
      </div>
    </div>
  )
}
