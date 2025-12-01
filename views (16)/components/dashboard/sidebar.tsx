"use client"

import { useState } from "react"
import { Menu, X, LayoutDashboard, Users, BookOpen, GraduationCap, Settings, LogOut, ChevronRight } from "lucide-react"
import { cn } from "@/lib/utils"

interface SidebarProps {
  open: boolean
  onToggle: () => void
}

export function Sidebar({ open, onToggle }: SidebarProps) {
  const [activeItem, setActiveItem] = useState("dashboard")

  const menuItems = [
    { id: "dashboard", label: "Dashboard", icon: LayoutDashboard, href: "#" },
    { id: "students", label: "Students", icon: Users, href: "#" },
    { id: "classes", label: "Classes", icon: BookOpen, href: "#" },
    { id: "majors", label: "Majors", icon: GraduationCap, href: "#" },
  ]

  const bottomItems = [
    { id: "settings", label: "Settings", icon: Settings, href: "#" },
    { id: "logout", label: "Logout", icon: LogOut, href: "#" },
  ]

  return (
    <>
      {/* Mobile Toggle */}
      <button onClick={onToggle} className="fixed top-6 left-6 z-40 lg:hidden p-2 rounded-lg glass-card">
        {open ? <X size={20} /> : <Menu size={20} />}
      </button>

      {/* Sidebar */}
      <div
        className={cn(
          "fixed lg:static left-0 top-0 h-screen w-64 glass-card border-r transition-all duration-300 flex flex-col z-30",
          !open && "-translate-x-full lg:translate-x-0",
        )}
      >
        {/* Logo */}
        <div className="p-6 border-b border-border/50">
          <div className="flex items-center gap-3">
            <div className="w-10 h-10 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
              <GraduationCap size={24} className="text-white" />
            </div>
            <div>
              <h2 className="font-bold text-foreground">EduPlus</h2>
              <p className="text-xs text-muted-foreground">Pro</p>
            </div>
          </div>
        </div>

        {/* Navigation */}
        <div className="flex-1 overflow-y-auto p-4 space-y-2">
          {menuItems.map((item) => (
            <button
              key={item.id}
              onClick={() => setActiveItem(item.id)}
              className={cn(
                "w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 relative group",
                activeItem === item.id
                  ? "bg-primary/20 text-primary"
                  : "text-muted-foreground hover:text-foreground hover:bg-muted/50",
              )}
            >
              {activeItem === item.id && (
                <div className="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-primary rounded-r-full" />
              )}
              <item.icon size={20} />
              <span className="font-medium">{item.label}</span>
              {activeItem === item.id && <ChevronRight size={16} className="ml-auto opacity-60" />}
            </button>
          ))}
        </div>

        {/* Bottom Items */}
        <div className="p-4 border-t border-border/50 space-y-2">
          {bottomItems.map((item) => (
            <button
              key={item.id}
              className="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-muted-foreground hover:text-foreground hover:bg-muted/50 transition-all duration-200"
            >
              <item.icon size={20} />
              <span className="font-medium">{item.label}</span>
            </button>
          ))}
        </div>

        {/* User Profile */}
        <div className="p-4 border-t border-border/50">
          <div className="flex items-center gap-3 px-4 py-3 rounded-lg glass-card">
            <div className="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-secondary" />
            <div className="flex-1 text-sm">
              <p className="font-medium">Admin User</p>
              <p className="text-xs text-muted-foreground">Administrator</p>
            </div>
          </div>
        </div>
      </div>

      {/* Overlay */}
      {open && <div className="fixed inset-0 bg-black/50 backdrop-blur-sm lg:hidden z-20" onClick={onToggle} />}
    </>
  )
}
