"use client"

import type React from "react"

import { Users, BookOpen, GraduationCap, Calendar, TrendingUp } from "lucide-react"
import { useEffect, useState } from "react"

interface StatCard {
  id: string
  label: string
  value: number
  icon: React.ReactNode
  color: string
  trend?: number
}

export function StatisticCards() {
  const [stats, setStats] = useState<StatCard[]>([])

  useEffect(() => {
    // Simulate loading
    setStats([
      {
        id: "academic-year",
        label: "Active Academic Year",
        value: 2024,
        icon: <Calendar className="w-6 h-6" />,
        color: "from-blue-500 to-cyan-500",
        trend: 5,
      },
      {
        id: "majors",
        label: "Total Majors",
        value: 12,
        icon: <GraduationCap className="w-6 h-6" />,
        color: "from-purple-500 to-pink-500",
        trend: 2,
      },
      {
        id: "classes",
        label: "Total Classes",
        value: 48,
        icon: <BookOpen className="w-6 h-6" />,
        color: "from-orange-500 to-red-500",
        trend: 8,
      },
      {
        id: "students",
        label: "Total Students",
        value: 1250,
        icon: <Users className="w-6 h-6" />,
        color: "from-green-500 to-emerald-500",
        trend: 12,
      },
    ])
  }, [])

  return (
    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      {stats.map((stat) => (
        <div key={stat.id} className="stat-card group">
          <div className="flex items-start justify-between">
            <div>
              <p className="text-sm text-muted-foreground mb-2">{stat.label}</p>
              <div className="flex items-baseline gap-2">
                <h3 className="text-3xl font-bold text-foreground">{stat.value.toLocaleString()}</h3>
                {stat.trend && (
                  <div className="flex items-center gap-1 text-green-400 text-sm font-medium">
                    <TrendingUp size={16} />+{stat.trend}%
                  </div>
                )}
              </div>
            </div>
            <div
              className={cn(
                "p-3 rounded-lg glass-card group-hover:scale-110 transition-transform",
                `bg-gradient-to-br ${stat.color} bg-opacity-10`,
              )}
            >
              <div className={`text-${stat.color.split("-")[1]}-400 icon-glow`}>{stat.icon}</div>
            </div>
          </div>
        </div>
      ))}
    </div>
  )
}

function cn(...classes: any[]) {
  return classes.filter(Boolean).join(" ")
}
