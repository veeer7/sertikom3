"use client"

import { useState } from "react"
import {
  BarChart3,
  Users,
  BookOpen,
  GraduationCap,
  Calendar,
  Settings,
  LogOut,
  ChevronRight,
  Menu,
  X,
} from "lucide-react"

const menuItems = [
  { id: "dashboard", label: "Dashboard", icon: BarChart3 },
  { id: "students", label: "Students", icon: Users },
  { id: "classes", label: "Classes", icon: BookOpen },
  { id: "majors", label: "Majors", icon: GraduationCap },
  { id: "academic-year", label: "Academic Year", icon: Calendar },
  { id: "settings", label: "Settings", icon: Settings },
]

export default function Sidebar() {
  const [isOpen, setIsOpen] = useState(true)
  const [activeItem, setActiveItem] = useState("dashboard")

  return (
    <>
      {/* Mobile Toggle */}
      <button
        onClick={() => setIsOpen(!isOpen)}
        className="fixed top-4 left-4 z-50 md:hidden p-2 glass-card rounded-lg"
      >
        {isOpen ? <X size={20} /> : <Menu size={20} />}
      </button>

      {/* Sidebar */}
      <aside
        className={`fixed left-0 top-0 h-screen glass-card border-r border-border/50 transition-all duration-300 ${
          isOpen ? "w-64" : "w-20"
        } overflow-hidden md:translate-x-0 ${isOpen ? "translate-x-0" : "-translate-x-full"} md:relative z-40`}
      >
        {/* Logo */}
        <div className="flex items-center justify-center h-20 border-b border-border/50">
          <div className="flex items-center gap-3">
            <div className="w-10 h-10 rounded-lg glow-border flex items-center justify-center">
              <GraduationCap size={24} className="glow-text" />
            </div>
            {isOpen && <span className="font-bold text-lg glow-text">EduAdmin</span>}
          </div>
        </div>

        {/* Menu Items */}
        <nav className="flex flex-col gap-2 p-4 flex-1">
          {menuItems.map((item) => {
            const Icon = item.icon
            const isActive = activeItem === item.id
            return (
              <button
                key={item.id}
                onClick={() => setActiveItem(item.id)}
                className={`flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group relative ${
                  isActive
                    ? "bg-primary/20 text-primary"
                    : "text-muted-foreground hover:text-foreground hover:bg-muted/50"
                }`}
              >
                {isActive && (
                  <div className="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-gradient-to-b from-primary to-secondary rounded-r-lg"></div>
                )}
                <Icon size={20} className={isActive ? "icon-glow" : ""} />
                {isOpen && <span className="text-sm font-medium">{item.label}</span>}
                {isOpen && isActive && <ChevronRight size={16} className="ml-auto" />}
              </button>
            )
          })}
        </nav>

        {/* User Profile & Logout */}
        <div className="border-t border-border/50 p-4 space-y-3">
          <div className="flex items-center gap-3 px-2">
            <div className="w-10 h-10 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center flex-shrink-0">
              <span className="text-white font-bold text-sm">AD</span>
            </div>
            {isOpen && (
              <div className="flex-1 min-w-0">
                <p className="text-sm font-medium truncate">Admin</p>
                <p className="text-xs text-muted-foreground truncate">admin@school.edu</p>
              </div>
            )}
          </div>
          <button className="w-full flex items-center gap-2 px-4 py-2 rounded-lg text-destructive hover:bg-destructive/10 transition-colors text-sm font-medium">
            <LogOut size={16} />
            {isOpen && "Logout"}
          </button>
        </div>
      </aside>

      {/* Mobile Overlay */}
      {isOpen && <div className="fixed inset-0 bg-black/50 md:hidden z-30" onClick={() => setIsOpen(false)} />}
    </>
  )
}
