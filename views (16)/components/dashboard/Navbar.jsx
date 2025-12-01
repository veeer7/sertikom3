"use client"

import { Bell, Search, Settings } from "lucide-react"
import { useState } from "react"

export default function Navbar() {
  const [searchFocus, setSearchFocus] = useState(false)
  const [notificationOpen, setNotificationOpen] = useState(false)

  return (
    <nav className="sticky top-0 z-40 glass-card border-b border-border/50 backdrop-blur-xl">
      <div className="px-6 py-4 flex items-center justify-between">
        {/* Search Bar */}
        <div className="flex-1 max-w-md">
          <div
            className={`relative transition-all duration-200 ${
              searchFocus ? "glass-card" : "bg-muted/30"
            } rounded-lg px-4 py-2.5 border border-border/50 flex items-center gap-2`}
          >
            <Search size={18} className="text-muted-foreground" />
            <input
              type="text"
              placeholder="Search students, classes..."
              className="bg-transparent outline-none text-sm flex-1 placeholder:text-muted-foreground"
              onFocus={() => setSearchFocus(true)}
              onBlur={() => setSearchFocus(false)}
            />
          </div>
        </div>

        {/* Right Actions */}
        <div className="flex items-center gap-4 ml-4">
          {/* Notifications */}
          <div className="relative">
            <button
              onClick={() => setNotificationOpen(!notificationOpen)}
              className="relative p-2 hover:bg-muted/50 rounded-lg transition-colors"
            >
              <Bell size={20} className="text-muted-foreground hover:text-foreground" />
              <span className="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
            </button>

            {/* Notification Dropdown */}
            {notificationOpen && (
              <div className="absolute right-0 mt-2 w-80 glass-card rounded-lg border border-border/50 shadow-2xl">
                <div className="p-4 border-b border-border/50">
                  <h3 className="font-semibold text-sm">Notifications</h3>
                </div>
                <div className="max-h-96 overflow-y-auto">
                  {[1, 2, 3].map((i) => (
                    <div
                      key={i}
                      className="p-4 border-b border-border/50 hover:bg-muted/50 transition-colors cursor-pointer"
                    >
                      <p className="text-sm font-medium">New student enrollment</p>
                      <p className="text-xs text-muted-foreground mt-1">2 minutes ago</p>
                    </div>
                  ))}
                </div>
              </div>
            )}
          </div>

          {/* Settings */}
          <button className="p-2 hover:bg-muted/50 rounded-lg transition-colors">
            <Settings size={20} className="text-muted-foreground hover:text-foreground" />
          </button>

          {/* User Avatar */}
          <div className="flex items-center gap-3 pl-4 border-l border-border/50">
            <div className="w-9 h-9 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center cursor-pointer hover:shadow-lg hover:shadow-primary/20 transition-all">
              <span className="text-white font-bold text-xs">AD</span>
            </div>
          </div>
        </div>
      </div>
    </nav>
  )
}
