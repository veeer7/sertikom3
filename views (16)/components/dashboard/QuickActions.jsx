"use client"

import { Plus, Upload } from "lucide-react"

const actions = [
  {
    id: "add-student",
    label: "Add Student",
    icon: Plus,
    color: "from-primary to-purple-600",
  },
  {
    id: "add-class",
    label: "Add Class",
    icon: Plus,
    color: "from-cyan-500 to-blue-600",
  },
  {
    id: "add-major",
    label: "Add Major",
    icon: Plus,
    color: "from-emerald-500 to-green-600",
  },
  {
    id: "import-excel",
    label: "Import Excel",
    icon: Upload,
    color: "from-orange-500 to-red-600",
  },
]

export default function QuickActions() {
  return (
    <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
      {actions.map((action) => {
        const Icon = action.icon
        return (
          <button
            key={action.id}
            className={`group relative overflow-hidden rounded-xl p-6 text-center transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20`}
          >
            {/* Gradient Background */}
            <div
              className={`absolute inset-0 bg-gradient-to-br ${action.color} opacity-90 group-hover:opacity-100 transition-opacity`}
            ></div>

            {/* Animated Hover Effect */}
            <div className="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity" />

            {/* Content */}
            <div className="relative z-10 flex flex-col items-center gap-3">
              <div className="p-3 bg-white/20 rounded-lg backdrop-blur-sm group-hover:bg-white/30 transition-colors">
                <Icon size={24} className="text-white" />
              </div>
              <span className="text-sm font-semibold text-white">{action.label}</span>
            </div>
          </button>
        )
      })}
    </div>
  )
}
